<?php


class LogResolver
{
    private const BASEPATH = './logfile.txt';

    private array $currentLog = [];

    public function __construct(private string $logPath = self::BASEPATH)
    {
    }

    public function __destruct()
    {
        echo file_get_contents($this->logPath);
    }

    public function add(string $fileData): void
    {
        $timeWithTimeStampNow = time();
        $fileData .= " " . date("F d, Y h:i:s",$timeWithTimeStampNow) . ',' . PHP_EOL;
        $addToFile = file_put_contents($this->logPath,$fileData,FILE_APPEND | LOCK_EX);
        $this->currentLog[] = $fileData;
    }

    public function getCurrentLog(): array
    {
        return $this->currentLog;
    }

}


