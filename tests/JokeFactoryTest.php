<?php

namespace Tonaflcastelan\ChuckNorrisJokes\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Tonaflcastelan\ChuckNorrisJokes\JokeFactory;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $mock = new MockHandler([
            new Response(200, [], '{ "type": "success", "value": { "id": 456, "joke": "All browsers support the hex definitions #chuck and #norris for the colors black and blue.", "categories": ["nerdy"] } }'),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $jokes = new JokeFactory($client);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('All browsers support the hex definitions #chuck and #norris for the colors black and blue.', $joke);
    }
}
