<?php

class Apartment
{
    private $id;
    private $user_id;
    private $apartment_id;
    private $start_time;
    private $end_time;


    public function __construct($id,$user_id,$apartment_id,$start_time,$end_time)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->apartment_id = $apartment_id;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getApartmentId()
    {
        return $this->apartment_id;
    }

    /**
     * @return mixed
     */
    public function getStart()
    {
        return $this->start_time;
    }

    /**
     * @param mixed $time
     */
    public function setStart($time): void
    {
        $this->start_time = $start_time;
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end_time;
    }

    /**
     * @param mixed $time
     */
    public function setEnd($time): void
    {
        $this->end_time = $end_time;
    }
}