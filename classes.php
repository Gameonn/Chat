<?php

class user {

	private $UserId, $UserName, $UserMail, $UserPassword;

	public function getUserId(){
		return ($this->UserId);
	}

	public function setUserId($UserId){
		$this->UserId = $UserId; 
	}

	public function getUserName(){
		return ($this->UserName);
	}

	public function setUserName($UserName){
		$this->UserName = $UserName; 
	}

	public function getUserMail(){
		return ($this->UserMail);
	}

	public function setUserMail($UserMail){
		$this->UserMail = $UserMail; 
	}

	public function getUserPassword(){
		return ($this->UserPassword);
	}

	public function setUserPassword($UserPassword){
		$this->UserPassword = $UserPassword; 
	}


	public function InsertUser(){
		include("conn.php");
		$req = $bdd->prepare("INSERT INTO users(UserName, UserMail, UserPassword) VALUES (:UserName, :UserMail, :UserPassword)");
		$req->execute(array(
			 'UserName'=>$this->getUserName(),
			 'UserMail'=>$this->getUserMail(),
			 'UserPassword'=>$this->getUserPassword()
			 ));
	}

	public function UserLogin() {
		include("conn.php");
		$req = $bdd->prepare("SELECT * FROM users WHERE UserMail=:UserMail AND UserPassword=:UserPassword");

		$req->execute(array(
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
			));

		if ($req->rowCount() == 0) {
			header("Location: index.php?error=1");
			return (false);
		}
		else {

			$logged = $bdd->prepare("UPDATE users SET Logged = 1 WHERE UserMail=:UserMail AND UserPassword=:UserPassword");

			$logged->execute(array(
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
			));

			while ($data = $req->fetch()) {
				$this->setUserId($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserPassword($data['UserPassword']);
				$this->setUserMail($data['UserMail']);
				header("Location: home.php");
				return (true);
			}
		}
	}

	public function UserLogOut() {
		include("conn.php");
		$logged = $bdd->prepare("UPDATE users SET Logged = 0 WHERE UserId=:UserId");
		$logged->execute(array(
				'UserId'=>$this->getUserId()
				));
	}

}

class chat {

	private $ChatId, $ChatUserId, $ChatText;

	public function getChatId() {
		return ($this->ChatId);
	}

	public function setChatId($ChatId) {
		$this->ChatId = $ChatId;
	}

	public function getChatUserId() {
		return ($this->ChatUserId);
	}

	public function setChatUserId($ChatUserId) {
		$this->ChatUserId = $ChatUserId;
	}

	public function getChatText() {
		return ($this->ChatText);
	}

	public function setChatText($ChatText) {
		$this->ChatText = $ChatText;
	}

	public function InsertChatMessage() {
 
		include("conn.php");

		$req = $bdd->prepare("INSERT INTO chats(ChatUserId, ChatText) VALUES (:ChatUserId, :ChatText)");
		$req->execute(array(
			'ChatUserId'=>$this->getChatUserId(),
			'ChatText'=>$this->getChatText()
			));
	}

	public function DisplayMessages() {
		include("conn.php");
		$ChatReq = $bdd->prepare("SELECT * FROM chats ORDER BY ChatId ASC");
		$ChatReq->execute();

		while($DataChat = $ChatReq->fetch()) {
			$UserReq = $bdd->prepare("SELECT * FROM users WHERE UserId = :UserId");
			$UserReq->execute(array(
				"UserId"=>$DataChat['ChatUserId']
				));
			$DataUser = $UserReq->fetch();
			?>
			<?php if (intval($DataUser['Logged']) == 1) { ?>
			<div class="online"></div>
			<?php } else { ?>
			<div class="offline"></div>
			<?php } ?>
			<p class="UserNameChat"><b><?php echo htmlspecialchars($DataUser['UserName']); ?></b> <i>says :</i> </p>
			<p class="ChatTextMsg"><?php echo htmlspecialchars($DataChat['ChatText']); ?></p>
		<?php 
		}
	}

}

?>