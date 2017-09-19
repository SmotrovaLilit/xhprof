<?php

namespace SmotrovaLilit;

/**
 * Interface ProfilerServiceInterface
 * @package SmotrovaLilit
 */
interface ProfilerServiceInterface
{
    /**
     * Начинает профилирование
     * @return void
     */
    public function startProfiling();

    /**
     * Завершает профилирование и возвращает id отчета
     * @return int
     */
    public function endProfiling();
}