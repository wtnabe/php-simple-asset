<?php // -*- mode: php -*-
group('phpcs', function() {
    function command($report_type = null) {
      $report = $report_type ? "--report={$report_type}" : "";
      system("./vendor/bin/phpcs --standard=PSR2 {$report} **/*.php");
    }
    desc('run phpcs');
    task('report', function() {
        command();
    });
    desc('run phpcs for report');
    task('checkstyle', function() {
        command('checkstyle');
    });
    desc('run phpcs for edit');
    task('edit', function() {
        command('emacs');
    });
});
desc('run phpunit');
task('test', function() {
    system('./vendor/bin/phpunit --colors tests');
});
