<?php
# Geolocation example https://www.codexworld.com/get-visitor-location-using-html5-geolocation-api-php/
# API https://documentation.concrete5.org/tutorials/creating-a-simple-api-for-posting-blogs
# https://documentation.concrete5.org/tutorials/concrete5-coding-guideline-57x-and-later

namespace Application\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

defined('C5_EXECUTE') or die('Access Denied.');

class CalculateTime extends PageController {

        private $zenith = 90+50/60;
        private $lat = 47.1881119;
        private $long = 7.7009241;

        private function genTime($timestamp) {
                return strftime("%H:%M", $timestamp);
        }

        private function genDate($timestamp) {
                return strftime("%d.%m.%Y", $timestamp);
        }

        private function genDay($timestamp) {
                return strftime("%a", $timestamp);
        }

        private function genDuration($duration) {
                $ret = "";
                if ($hour = floor($duration / 3600))
                        $ret .= $hour . "h ";
                if ($min = floor((($duration - ($hour * 3600)) / 60)))
                        $ret .= $min . "min ";
                return $ret;
        }

        private function getSunrise($dstDate) {
                return date_sunrise ($dstDate, SUNFUNCS_RET_TIMESTAMP, $this->$lat, $this->$long, $this->$zenith);
        }

        private function getSunset($dstDate) {
                return date_sunset ($dstDate, SUNFUNCS_RET_TIMESTAMP, $this->$lat, $this->$long, $this->$zenith);
        }

        private function genOutput($date, $sunrise, $sunset) {
                $jsonArray = [
                        'date'=> $this->genDate($date),
                        'day'=> $this->genDay($date),
                        'sunrise'=> $this->genTime($sunrise),
                        'sunset'=> $this->genTime($sunset),
                        'duration'=> $this->genDuration($sunset - $sunrise),
                ];
                return $jsonArray;
        }

        public function getList($long = NULL, $lat = NULL) {
                if ($long) $this->$long = $long;
                if ($lat) $this->$lat = $lat;

                $now = time();
                for ($x = 1; $x <= 365; $x++) {
                        #1 day = 86400 secs
                        $this->genOutput($now, $this->getSunrise($now), $this->getSunset($now));
                        $now += 86400;
                }

                WIP
                $jsonArray = [
                        'secret'=> $this->getSecret(),
                        'clientID' => $this->generateClientID($user->getUserID())
                ];
                return new JsonResponse($jsonArray, 200);

        }

        public function getSimple($long = NULL, $lat = NULL) {
                if ($long) $this->$long = $long;
                if ($lat) $this->$lat = $lat;

                $event = $day = $duration = $time = "";

                $now = time();
                $sunrise = $this->getSunrise($now);
                $data = $this->getSunset($now);
                if ($now < $sunrise) {
                        $event = "light";
                        $day = "today";
                        $duration = $this->genDuration($sunrise - $now);
                        $time = $this->genTime($sunrise);
                } elseif ($now < $sunset) {
                        $event = "dark";
                        $day = "today";
                        $duration = $this->genDuration($sunset - $now);
                        $time = $this->genTime($sunset);
                } else {
                        $sunriseTomorrow = $this->getSunData($now + (24 * 60 * 60))

                        $event = "light";
                        $day = "tomorrow";
                        $duration = $this->genDuration($sunriseTomorrow - $now);
                        $time = $this->genTime($sunriseTomorrow);
                }


                $jsonArray = [
                        'event'=> $event,
                        'day'=> $day,
                        'duration'=> $duration,
                        'time'=> $time,
                ];
                return new JsonResponse($jsonArray, 200);
        }

}
