<?php

class DbController   {
    private $conn;

    public function dbConnect($host, $username, $password, $db)
    {
        $this->conn = new mysqli( 
        $this->host = $host,
        $this->user = $username,
        $this->pass = $password,
        $this->db = $db
        );
        //handling error
        if ($this->conn->connect_errno) {
            exit('Connection failed');
        }

        return $this->conn;
    }

    public function cleanUp ($value)
    {
        $value = trim($value);
        return $value;
    }

    public function insertQuery ($sql, $tourism_name, $tourism_location, $tourism_theme, $tourism_description, $file_name) 
    {
        $stmt = $this->conn->prepare($sql);
        
        if(!$stmt) {
            $this->logError($this->conn->error);
            exit("An error occurred");
        }

        $stmt->bind_param("sssss",$tourism_name,$tourism_location,$tourism_theme,$tourism_description,$file_name);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    private function logError($error) 
    {
        error_log("SQL Error: $error" . PHP_EOL, 3, "logs/my-errors.log");
        exit("Oops something went wrong");
    }

    public function uploadImage($temp, $dest) 
    {
        if(move_uploaded_file($temp,$dest)) 
        {
            echo"Image moved to folder";
        } else {
            echo"Image not moved to folder";
        }
    }

    public function getRecords($sql) {
		$result = $this->conn->query($sql);
		while ($row = $result->fetch_assoc() ) {
			$resultset[] = $row;
		}
		return $resultset;
	}


	public function searchQuery($sql,$search) {
		$stmt = $this->conn->prepare($sql);
		if(!$stmt) {
		exit("prepare failed: ".$this->conn->error);
		}
		$stmt->bind_param("ss", $search, $search); 
		$stmt->execute();
		$result = $stmt->get_result(); 
		$resultset = $result->fetch_all(MYSQLI_ASSOC);
		return $resultset;
	}

	public function deleteRecord($sql, $tourism_id)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("i", $tourism_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }

	public function updateRecord($sql, $tourism_name, $tourism_location, $tourism_theme, $tourism_description, $tourism_id)
    {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            exit("prepare failed: " . $this->conn->error);
        }
        $stmt->bind_param("ssssi", $tourism_name, $tourism_location, $tourism_theme, $tourism_description, $tourism_id);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        }
        return false;
    }
}    
?>