<?php
namespace Foundation\Html;

use DateTime;

class Date
{
    /**
     * @var \DateTime
     */
    protected $date;

    public function setDate($date)
    {
        $this->date = new DateTime($date);

        return $this;
    }

    public function getDayOfMonth()
    {
        return $this->date->format('d');
    }

    public function getYear()
    {
        return $this->date->format('Y');
    }

    public function getYearAndMonthSpelledOut()
    {
        return \utf8_encode(strftime('%B, %Y', $this->date->format('U')));
    }

    public function getDayOfWeek()
    {
        return \utf8_encode(strftime('%A', $this->date->format('U')));
    }

    public function format($format)
    {
        return $this->date->format($format);
    }
}
