<?

function pdo() {
    $dbname = 'php15-00proga';
    $user = 'root';
    $pass = '';
    $host = 'localhost';
    return $res = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    /* PDO() - Делает соединение между php и бд */
}

function userReg($login,$name,$pass,$photo) {
    try{    
        $pdo = pdo();
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, login, pass,photo) VALUES (?,?,?,?)";
        $driver = $pdo->prepare($query);
        $result = $driver->execute([$name,$login,$pass,$photo]);
    }catch(PDOException $e){
        echo 'ERROR' . $e -> getMessage();
    }
    
    return $result;
}
function userComments($login,$comments,$photo) {
    $pdo = pdo();
    $query = "INSERT INTO commentss (login,comment,photo) VALUES (?,?,?)";
    $driver = $pdo->prepare($query);
    $result = $driver->execute([$login,$comments,$photo]);
    
    return $result;
}

function delComments($id) {
    try{    
        $pdo = pdo();
        $query = "DELETE FROM commentss  WHERE id = $id";
        $affectedRowsNumber = $pdo->exec($query);
    }catch (PDOException $e){
        echo "Database error: " . $e->getMessage();
    }
}
function renComments($id,$comment) {
    try{    
        $pdo = pdo();
        $query = "UPDATE comments SET comment = '$comment'  WHERE id = '$id'";
        $affectedRowsNumber = $pdo->exec($query);
    }catch (PDOException $e){
        echo "Database error: " . $e->getMessage();
    }
}

function userSign($login,$pass) {
    $pdo = pdo();
    $query = "SELECT * FROM users WHERE login=?";
    $driver = $pdo->prepare($query);
    $result = $driver-> execute([$login]);
    $user = $driver->fetch(PDO::FETCH_ASSOC);
    // user - возращает нам ассоциативный массив пользователей который нашел в бд
    if($user['login'] == $login && password_verify($pass, $user['pass'])) {
       $_SESSION['login'] = $user['login'];
       $_SESSION['photo'] = $user['photo'];
       $_SESSION['role'] = $user['role'];
       $_SESSION['name'] = $user['name'];
    }else {
        return false;
    }
}
function commentAdd() {
    $pdo = pdo();
    $query = "SELECT * FROM commentss";
    $driver = $pdo->prepare($query);
    $driver-> execute([]);
    return $driver->fetchAll(PDO::FETCH_ASSOC);
}
