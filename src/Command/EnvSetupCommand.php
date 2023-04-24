<?php

namespace Aitum\CustomCode\Command;

use Composer\Command\BaseCommand;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class EnvSetupCommand extends BaseCommand
{
  protected function configure()
  {
    $this->setName('aitum-cc:setup')
      ->setDescription('Sets up .env file with AITUM_CC_ID, AITUM_CC_HOST, and API_KEY');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $defaultAitumCCId = Uuid::uuid4()->toString();
    $defaultAitumCCHost = "'Custom Code Wrapper: " . gethostname() . "'";

    $output->writeln("<fg=magenta;options=bold>AitumPHP Custom Code Setup</>");
    $output->writeln("<fg=magenta;options=bold>--------------------------</>");

    $aitumCCId = $this->prompt($input, $output, "AITUM_CC_ID [<fg=yellow>default: {$defaultAitumCCId}</>] (recommended): ", $defaultAitumCCId);
    $aitumCCHost = $this->prompt($input, $output, "AITUM_CC_HOST [<fg=yellow>default: {$defaultAitumCCHost}</>]: ", $defaultAitumCCHost);

    $output->writeln("\n<comment>Please provide your API_KEY. You can find the API_KEY in the Aitum settings menu.</comment>");
    $apiKey = $this->prompt($input, $output, "API_KEY: ");

    $envContents = <<<ENV
    AITUM_CC_ID={$aitumCCId}
    AITUM_CC_HOST={$aitumCCHost}
    API_KEY={$apiKey}
    ENV;

    file_put_contents(__DIR__ . '/../../.env', $envContents);

    $output->writeln("\n<info>.env file successfully created.</info>");

    return 0;
  }

  private function prompt(InputInterface $input, OutputInterface $output, string $message, string $default = null)
  {
    $questionHelper = $this->getHelper('question');
    $question = new Question($message, $default);
    return $questionHelper->ask($input, $output, $question);
  }
}
