<?

	if(!session_id()){
		session_start();
	}

	require_once("Facebook/autoload.php");



	class FacebookSDK{

		protected $fb;
		protected $helper;

		public function __construct(){

			$this->fb = new Facebook\Facebook(array(
				  'app_id' => '211474989230282',
				  'app_secret' => '9bfedffd5382e8d14c0bd11d7376448b',
				  'default_graph_version' => 'v2.9',
				));
			$this->helper = $this->fb->getRedirectLoginHelper();

		}

		function getLoginUrl($callback_url){

			$permissions = array('email','public_profile',"user_photos","publish_actions"); // optional
			$loginUrl = $this->helper->getLoginUrl($callback_url, $permissions);
			return $loginUrl;
		}


		function getAccessToken(){
			try {
			  $accessToken = $this->helper->getAccessToken();
			  return $accessToken;
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
				throw new Exception($e->getMessage());
			  // When Graph returns an error
			  // echo 'Graph returned an error: ' . $e->getMessage();
			  // exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  // echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  // exit;
				throw new Exception($e->getMessage());
			}
		}


		function getUserData($access_token){
			$this->fb->setDefaultAccessToken($access_token);

			try {
			  $response = $this->fb->get('/me?fields=id,name,email');
			  $userNode = $response->getGraphUser();
			  return $userNode;
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  ///echo 'Graph returned an error: ' . $e->getMessage();
			  //exit;
				throw new Exception($e->getMessage());
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
			  //exit;
				throw new Exception($e->getMessage());
			}

		}


	}
