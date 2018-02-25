<?php
class Post {
        public function hall($start,$userid) {
                $mCI =& get_instance();
                if($mCI->getposts->allposts($userid)){
                                $posts = $mCI->getposts->allposts($userid);
                                $data = array();
                                $result = array();
                        foreach($posts as $post) {
                                $phpdate = strtotime( $post['posted_at'] );
                              $p=array('PostType'=>$post['type'],
                                                'PostId'=>$post['id'],
                                                'PostUserPicture'=>$post['picture'],
                                                'PostUser'=>$post['username'],
                                                'PostLikes'=>$post['likes'],
                                                'PostComments'=>$post['comments'],
                                                'PostDate'=>date( 'M d Y h:i a', $phpdate ),
                                                'thoughtBody'=>$mCI->topics->link_add($post['body']),
                                                'audioAbout'=>$mCI->topics->link_add($post['about']),
                                                'videoAbout'=>$mCI->topics->link_add($post['description']),
                                                'audioPath'=>$post['path'],
                                                'videoPath'=>$post['url'],
                                                'audioTitle'=>$post['title'],
                                                'videoTitle'=>$post['name'],
                                                'audioGenre'=>$post['genre'],
                                                'audioCover'=>$post['cover'],
                                                'audioviews'=>$post['views'],
                                                'videoviews'=>$post['plays'],
                                );
                              array_push($result,$p);
                        }
                        for ($i = $start; $i < $start+5; $i++) {
                                if ($i < count($result)) {
                                        array_push($data, $result[$i]);
                                }
                        }
                        return $data;
                      
                }
                else{
                        $data = array('PostId'=>"error");
                        return $data;
                }
                
        }

        public function thoughts($browseUserid,$type){
                $mCI =& get_instance();
                if($type=='studio'){
                        $posts = $mCI->getposts->readthoughts($browseUserid);
                }
                else{
                        $posts = $mCI->getSearch->getthoughtsearch($browseUserid);
                }
                if($posts){
                        
                        $result = array();
                        foreach($posts as $post) {

                              $p=array(
                                                'id'=>$post['id'],
                                                'username'=>$post['username'],
                                                'picture'=>$post['picture'],
                                                'body'=>$mCI->topics->link_add($post['body']),
                                                'posted_at'=>$post['posted_at'],
                                                'likes'=>$post['likes'],
                                                'comments'=>$post['comments']
                                        );
                              array_push($result,$p);
                        }

                        return $result;
                }
                else{
                        $result = array('id'=>"error");
                        return $result;
                }
        }

        public function audios($browseUserid,$type){
                $mCI =& get_instance();
                if($type=='studio'){
                        $posts = $mCI->getposts->readaudios($browseUserid);
                }
                else if('search'){
                        $posts = $mCI->getSearch->getaudiosearch($browseUserid);
                }

                else{
                        $posts = $mCI->getBrowse->getaudiosearch();
                }
                if($posts){
                        
                        $res = array();
                        foreach($posts as $results) {
                                $p=array(
                                                'id'=>$results['id'],
                                                'username'=>$results['username'],
                                                'picture'=>$results['picture'],
                                                'about'=>$mCI->topics->link_add($results['about']),
                                                'posted_at'=>$results['posted_at'],
                                                'likes'=>$results['likes'],
                                                'comments'=>$results['comments'],
                                                'cover'=>$results['cover'],
                                                'title'=>$results['title'],
                                                'path'=>$results['path'],
                                                'genre'=>$results['genre'],
                                                'views'=>$results['views']
                                        );
                                array_push($res,$p);

                        }
                        return $res;
                }
                else{
                        $res = array('id'=>"error");
                        return $res;
                }
        }
        public function videos($browseUserid,$type){
                $mCI =& get_instance();
                if($type=='studio'){
                        $posts = $mCI->getposts->readvideos($browseUserid);
                }
                else if('search'){
                        $posts = $mCI->getSearch->getvideosearch($browseUserid);
                }
                else{
                        $posts = $mCI->getBrowse->getvideosearch();
                }
                if($posts){
                        $res = array();
                        foreach($posts as $results) {
                                $p=array(
                                                'id'=>$results['id'],
                                                'username'=>$results['username'],
                                                'picture'=>$results['picture'],
                                                'description'=>$mCI->topics->link_add($results['description']),
                                                'posted_at'=>$results['posted_at'],
                                                'likes'=>$results['likes'],
                                                'comments'=>$results['comments'],
                                                'name'=>$results['name'],
                                                'url'=>$results['url'],
                                                'plays'=>$results['plays']
                                        );
                                array_push($res,$p);

                        }
                        return $res;
                }
                else{
                        $res = array('id'=>"error");
                        return $res;
                }
        }
}
?>
