<?php

declare(strict_types=1);

namespace Art4\Requests\Tests\Psr\Request;

use InvalidArgumentException;
use Psr\Http\Message\UriInterface;
use Art4\Requests\Psr\Request;
use Yoast\PHPUnitPolyfills\TestCases\TestCase;
use Art4\Requests\Tests\TypeProviderHelper;

final class HasHeaderTest extends TestCase
{
    /**
     * Tests receiving boolean when using hasHeader().
     *
     * @covers \Art4\Requests\Psr\Request::hasHeader
     *
     * @return void
     */
    public function testHasHeaderReturnsFalse()
    {
        $request = Request::withMethodAndUri('GET', $this->createMock(UriInterface::class));

        $this->assertFalse($request->hasHeader('name'));
    }

    /**
     * Tests receiving boolean when using hasHeader().
     *
     * @covers \Art4\Requests\Psr\Request::hasHeader
     *
     * @return void
     */
    public function testHasHeaderReturnsTrue()
    {
        $request = Request::withMethodAndUri('GET', $this->createMock(UriInterface::class));
        $request = $request->withHeader('name', 'value');

        $this->assertTrue($request->hasHeader('name'));
    }

    /**
     * Tests receiving boolean when using hasHeader().
     *
     * @covers \Art4\Requests\Psr\Request::hasHeader
     *
     * @return void
     */
    public function testHasHeaderWithCaseInsensitiveNameReturnsTrue()
    {
        $request = Request::withMethodAndUri('GET', $this->createMock(UriInterface::class));
        $request = $request->withHeader('NAME', 'value');

        $this->assertTrue($request->hasHeader('name'));
    }

    /**
     * Data Provider.
     *
     * @return array<string, mixed>
     */
    public function dataInvalidTypeNotString()
    {
        return TypeProviderHelper::getAllExcept(TypeProviderHelper::GROUP_STRING);
    }
}
