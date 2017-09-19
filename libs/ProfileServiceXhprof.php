<?php

namespace SmotrovaLilit;

use XHProfRuns_Default;


/**
 * Class ProfileServiceXhprof
 * @package SmotrovaLilit
 */
class ProfileServiceXhprof implements ProfilerServiceInterface
{
    /**
     * Источник, нужен для группировки отчетов
     * @var string
     */
    protected $type;

    /**
     * @param $type
     */
    public function __construct($type = '')
    {
        $this->type = $type;
    }

    /**
     * Начинает профилирование
     * @return void
     */
    public function startProfiling()
    {
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
    }

    /**
     * Завершает профилирование и возвращает id отчета
     * @return int
     */
    public function endProfiling()
    {
        $xhprofData = xhprof_disable();
        $xhprofRuns = new XHProfRuns_Default();
        return $xhprofRuns->save_run($xhprofData, $this->type);
    }
}