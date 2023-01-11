<?php 

class PostContr extends Post {

    protected $host;
    protected $user;
    protected $password;
    protected $database;

    public function __construct( $host, $user, $password, $database) {

        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        
    }
    
    // This function call create() in model. 
    public function createPost($userId, $title, $text) {

        if ($this->emptyInputs($userId, $title, $text) == false) {
            echo "<script type='text/javascript'>;
            alert('Input fields not be empty!');
            window.location.href='../views/create.php';
            </script>";
            exit();
        }
        if (!$this->tableCheck()) {   
            exit();
         }
            
        $this->create($userId, $title, $text); 
        
    }

    // This function call show() in model.
    public function showPost() {

        if (!$this->tableCheck()) {   
            return $results = $this->tableCheck(); 
            exit();
        }

        $results = $this->show();
        return $results;
        
    }

    // This function call post() in model.
    public function singlePost($id) {

        $result = $this->post($id);
        return $result;
    }

    // This function call edit() in model
    public function editPost($title, $text, $id) {

        $this->edit($title, $text, $id);
        
    }

    // This function call delete() in model
    public function deletePost($id) {

        $this->delete($id);
    }

    // Check for empty inputs.
    public function emptyInputs($userId, $title, $text) {

        if (empty($userId) || empty($title) || empty($text)) {
            return $result = false;       
        }
        else {
            return $result = true;             
        }
    }

    // This function call postsTableExists() in model.
    private function tableCheck() {
		
		$result;
		if (!$this->postsTableExists()) {
			$result = false;

		}else {
			$result = true;
		}

		return $result;
	}
}