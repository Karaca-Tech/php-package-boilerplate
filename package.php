<?php

function line(string $line, ?string $level = null)
{
    echo match ($level) {
        'error' => "\033[31m[x] \033[0m".$line.PHP_EOL,
        'success' => "\033[32m[+] \033[0m".$line.PHP_EOL,
        'warning' => "\033[33m[!] \033[0m".$line.PHP_EOL,
        'info' => "\033[36m[i] \033[0m".$line.PHP_EOL,
        default => $line.PHP_EOL,
    };

}

function info(string $line)
{
    line($line, 'info');
}

function success(string $line)
{
    line($line, 'success');
}

function error(string $line, int $exitCode = 0)
{
    line($line, 'error');
    exit($exitCode);
}

function warning(string $line)
{
    line($line, 'warning');
}

function ask(string $question, string $default = '')
{
    $answer = readline('>>  '.$question.($default ? " ({$default}) : " : ""));

    return !$answer ? $default : $answer;
}

function confirm(string $question, bool $default = true)
{
    $confirmation = ask($question.' ('.($default ? "\033[33mY\033[0m/n" : "y/\033[33mN\033[0m").") : ");


    return match (strtolower($confirmation ?? '')) {
        'y', 'yes', '1' => true,
        'n', 'no', '0' => false,
        default => $default
    };
}

function run(string $command): string
{
    return trim((string) shell_exec($command));
}

function help()
{


}


if (!($packageName = $argv[1] ?? null)) {
    error('Package name must be provided');
}

switch ($packageName) {
    case 'help':
        help();
        break;
    default:
        configurePackage($packageName);
        break;
}

$decisions = [
    'author' => ask('Package author', run('git config user.name')),
];

// tüm dosyaları al
// mevcut dosyada $decisions array'indeki değerleri çek
// str_replace...

