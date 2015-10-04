<?php

namespace spec\Scraper\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Scraper\Command\ProductExtractorCommand;
use Scraper\DataProvider\WebProductScraperInterface;
use Scraper\Output\ProductListFormatterInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Output\Output;

/**
 * Class ProductExtractorCommandSpec
 * @package spec\Scraper\Command
 * @mixin ProductExtractorCommand
 */
class ProductExtractorCommandSpec extends ObjectBehavior
{
    function let(
        WebProductScraperInterface $scraper,
        ProductListFormatterInterface $formatter
    )
    {
        $this->beConstructedWith($scraper, $formatter);
    }

    public function it_throws_exception_on_invalid_url(
        Input $input,
        Output $output
    )
    {
        $input->bind(Argument::any())->willReturn();
        $input->isInteractive()->willReturn(false);
        $input->validate()->willReturn();
        $input->getArgument("url")->willReturn("i_am_an_invalid_url");
        $this->shouldThrow(\Exception::class)->during("run", [ $input, $output ]);
    }
}
