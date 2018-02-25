<?php
class Notify {
        public function createNotify($text = "", $postid = 0,$type,$userfollow=null) {
                $mCI =& get_instance();
                $text = explode(" ", $text);
                $notify = array();

                foreach ($text as $word) {
                        if (substr($word, 0, 1) == "@") {
                                $notify[substr($word, 1)] = array("type"=>$type);
                        }
                }

                if ($type==2) {
                        $temp = $mCI->notif->notif($postid);
                        $r = $temp[0]["receiver"];
                        $s = $mCI->login->isLoggedIn();
                        if($r!=$s){
                                $data = array('id'=>null,
                                                'type'=>$type,
                                                'receiver'=>$r,
                                                'sender'=>$s,
                                                'post_id'=>$postid,
                                                'notifurl'=>'http://localhost/mimo/notification?pid='.$postid.''
                                                );
                                $mCI->notif->create($data);
                        }
                }
                if ($type==3) {
                        $temp = $mCI->notif->cnotif($postid);
                        $r = $temp[0]["receiver"];
                        $s = $mCI->login->isLoggedIn();
                        if($r!=$s){
                                $data = array('id'=>null,
                                                'type'=>$type,
                                                'receiver'=>$r,
                                                'sender'=>$s,
                                                'post_id'=>$postid,
                                                'notifurl'=>'http://localhost/mimo/notification?pid='.$postid.''
                                                );
                                $mCI->notif->create($data);
                        }
                }
                if($type==5){
                        $temp = $mCI->notif->cnotif($postid);
                        $r = $userfollow;
                        $s = $mCI->login->isLoggedIn();
                        $condition = array('id'=>$s);
                        $username = $mCI->get->read('users',$condition,'username')[0]['username'];
                        if($r!=$s){
                                $data = array('id'=>null,
                                                'type'=>$type,
                                                'receiver'=>$r,
                                                'sender'=>$s,
                                                'post_id'=>'',
                                                'notifurl'=>'http://localhost/mimo/myStudio?username='.$username.''
                                                );
                                $mCI->notif->create($data);
                        }
                }
                if($type==6){
                        $temp = $mCI->notif->cnotif($postid);
                        $r = $userfollow;
                        $s = $mCI->login->isLoggedIn();
                        $condition = array('id'=>$s);
                        $username = $mCI->get->read('users',$condition,'username')[0]['username'];
                        if($r!=$s){
                                $data = array('id'=>null,
                                                'type'=>$type,
                                                'receiver'=>$r,
                                                'sender'=>$s,
                                                'post_id'=>'',
                                                'notifurl'=>'http://localhost/mimo/myStudio?username='.$username.''
                                                );
                                $mCI->notif->create($data);
                        }
                }

                return $notify;
        }
}
?>
