<?php

namespace Tonaflcastelan\ChuckNorrisJokes\Tests;

use Tonaflcastelan\ChuckNorrisJokes\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase
{
    /** @test */
    public function it_returns_a_random_joke()
    {
        $jokes = new JokeFactory([
            'This is a joke',
        ]);
        $joke = $jokes->getRandomJoke();

        $this->assertSame('This is a joke', $joke);
    }

    /** @test */
    public function it_returns_a_predefined_joke()
    {
        $chuckNorrisJokes = [
            'The First rule of Chuck Norris is: you do not talk about Chuck Norris.',
            'Chuck Norris counted to infinity... Twice.',
            'If you can see Chuck Norris, he can see you. If you can\'t see Chuck Norris you may be only seconds away from death.'
        ];
        $jokes = new JokeFactory();
        $joke = $jokes->getRandomJoke();

        $this->assertContains($joke, $chuckNorrisJokes);
    }
}