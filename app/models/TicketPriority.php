<?php

class TicketPriority extends Eloquent {

    public $table = 'tickets_priorities';

    public $timestamps = false;

    protected $fillable = ['title', 'color'];

} 