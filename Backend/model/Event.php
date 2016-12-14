<?php

/**
 * Created by PhpStorm.
 * User: TheLetch
 * Date: 13/12/2016
 * Time: 18:01
 */
use Phalcon\Mvc\Model;
use Phalcon\Validation;

//use Phalcon\Validation\Validator\Uniqueness as Unique;

class Event extends Model
{
    private $event_id;
    private $event_name;
    private $type;
    private $date;
    private $begin;
    private $end;
    private $chat_id;

    /**
     * @return mixed
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * @param mixed $event_id
     */
//    public function setEventId($event_id)
//    {
//        $this->event_id = $event_id;
//    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->event_name;
    }

    /**
     * @param mixed $event_name
     */
    public function setEventName($event_name)
    {
        $this->event_name = $event_name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $selectedDate = strtotime($date);
        if (date_diff(date(),date('Y-m-d',$selectedDate))>=0){
            $this->date = $date;
        }else{
            json_encode('please select a latter date') ;
        }


    }

    /**
     * @return mixed
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * @param mixed $begin
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;
    }

    /**
     * @return mixed
     */
    public function getEnd()

    {
        return $this->end;
    }

    /**
     * @param mixed $end
     */
    public function setEnd($end)
    {

        //TODO: compare the end and the begin time
        $this->end = $end;


    }

    /**
     * @return mixed
     */
    public function getChatId()
    {
        return $this->chat_id;
    }

    /**
     * @param mixed $chat_id
     */
//    public function setChatId($chat_id)
//    {
//        $this->chat_id = $chat_id;
//    }


    public function validation(){
        $validator = new Validation();
        $validator->add(
            'date',
            new DateValidator(
                [
                    'format'=>'y-m-d',
                    'message'=>'Please check the date format',
                ]
            )
        );

        $validator->add(
            'event_name',
            new PresenceOf(
               [
                   'message'=> 'You should give a name to your event',
                   'cancelOnFail'=> true,
               ]
            )

        );

       //TODO: add a list of event type to the validator
    }



}