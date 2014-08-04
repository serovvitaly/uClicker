<?php

class Site extends Eloquent {

    public function user()
    {
        return $this->belongsTo('User');
    }


    /**
     * Блокирование сайта
     */
    public function blocking()
    {
        $this->blocked = 1;
        $this->save();
    }


    /**
     * Разблокирование сайта
     */
    public function unblocking()
    {
        $this->blocked = 0;
        $this->save();
    }
} 