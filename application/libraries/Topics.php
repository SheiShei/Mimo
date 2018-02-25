<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topics {
    public function getTopics($text) {

                $text = explode(" ", $text);

                $topics = "";

                foreach ($text as $word) {
                        if (substr($word, 0, 1) == "#") {
                                $topics .= substr($word, 1).",";
                        }
                }

                return $topics;
        }
        public function link_add($text) {
             $mCI =& get_instance();
                $text = explode(" ", $text);
                $newstring = "";

                foreach ($text as $word) {
                        if (substr($word, 0, 1) == "@") {
                            $at = substr($word, 1);
                            $condition = array('username'=>$at);
                            if($mCI->get->read('users',$condition,'id')){
                                $newstring .= "<a href='http://localhost/mimo/myStudio?username=".$at."'>".htmlspecialchars($word)."</a> ";
                            }
                            else{
                                $newstring .= htmlspecialchars($word)." ";
                            }
                        } else if (substr($word, 0, 1) == "#") {
                                $newstring .= "<a href='http://localhost/mimo/search?q=".substr($word, 1)."'>".htmlspecialchars($word)."</a> ";
                        } else {
                                $newstring .= htmlspecialchars($word)." ";
                        }
                }

                return $newstring;
        }
    }
