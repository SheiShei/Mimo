<?php
class Image {
        //pakigawang public function lang pag nilagay na sa library  wala ng static mahirap tawagin
        public function uploadImage($formname) {
               if ($formname['size'] > 10240000) {
                        redirect ('error');
                } 
				else
				{
				$image = base64_encode(file_get_contents($formname['tmp_name']));

                $options = array('http'=>array(
                        'method'=>"POST",
                        'header'=>"Authorization: Bearer fbec2d0f2c259944907341aeedb0a387f85fae12\n".
                        "Content-Type: application/x-www-form-urlencoded",
                        'content'=>$image
                ));

                $context = stream_context_create($options);

                $imgurURL = "https://api.imgur.com/3/image";

                

                $response = file_get_contents($imgurURL, false, $context);
				if($response === false)
				{	
					//echo "<script type='text/javascript'>alert('Connection Error');</script>";
					redirect ('error');
				}
				else
				{
                $response = json_decode($response);	
				$link=$response->data->link;
				return $link;
				}
				}
        }

}
?>