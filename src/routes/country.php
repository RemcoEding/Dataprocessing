<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = new \Slim\App;

$app->options('/{routes:,+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All Country
$app->get('/api/country' , function(Request $request, Response $response){
    $sql = "SELECT * FROM country";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $worlds = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($worlds);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Get Single Country
$app->get('/api/country/{code}' , function(Request $request, Response $response){
    $code = $request->getAttribute('code');
    
    $sql = "SELECT * FROM country WHERE code = '$code'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $world = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($world);

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Add Country
$app->post('/api/country/add' , function(Request $request, Response $response){
    $code = $request->getParam('code');
    $name = $request->getParam('name');
    $continent = $request->getParam('continent');
    $region = $request->getParam('region');
    $surfacearea = $request->getParam('surfacearea');
    $indepyear = $request->getParam('indepyear');
    $population = $request->getParam('population');
    $lifeexpectancy = $request->getParam('lifeexpectancy');
    $gnp = $request->getParam('gnp');
    $gnpold = $request->getParam('gnpold');
    $localname = $request->getParam('localname');
    $governmentform = $request->getParam('governmentform');
    $headofstate = $request->getParam('headofstate');
    $capital = $request->getParam('capital');
    $code2 = $request->getParam('code2');

    
    $sql = "INSERT INTO country (code,name,continent,region,surfacearea,indepyear,population,lifeexpectancy,gnp,gnpold,localname,governmentform,headofstate,capital,code2) VALUES
    (:code,:name,:continent,:region,:surfacearea,:indepyear,:population,:lifeexpectancy,:gnp,:gnpold,:localname,:governmentform,:headofstate,:capital,:code2)";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam('code', $code);
        $stmt->bindParam('name', $name);
        $stmt->bindParam('continent', $continent);
        $stmt->bindParam('region', $region);
        $stmt->bindParam('surfacearea', $surfacearea);
        $stmt->bindParam('indepyear', $indepyear);
        $stmt->bindParam('population', $population);
        $stmt->bindParam('lifeexpectancy', $lifeexpectancy);
        $stmt->bindParam('gnp', $gnp);
        $stmt->bindParam('gnpold', $gnpold);
        $stmt->bindParam('localname', $localname);
        $stmt->bindParam('governmentform', $governmentform);
        $stmt->bindParam('headofstate', $headofstate);
        $stmt->bindParam('capital', $capital);
        $stmt->bindParam('code2', $code2);

        $stmt->execute();

        echo '{"notice": {"text": "Country Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Country
$app->put('/api/country/update/{code1}' , function(Request $request, Response $response){
    $code1 = $request->getAttribute('code1');
    $code = $request->getParam('code');
    $name = $request->getParam('name');
    $continent = $request->getParam('continent');
    $region = $request->getParam('region');
    $surfacearea = $request->getParam('surfacearea');
    $indepyear = $request->getParam('indepyear');
    $population = $request->getParam('population');
    $lifeexpectancy = $request->getParam('lifeexpectancy');
    $gnp = $request->getParam('gnp');
    $gnpold = $request->getParam('gnpold');
    $localname = $request->getParam('localname');
    $governmentform = $request->getParam('governmentform');
    $headofstate = $request->getParam('headofstate');
    $capital = $request->getParam('capital');
    $code2 = $request->getParam('code2');

    
    $sql = "UPDATE country SET
                code = :code,
                name = :name,
                continent = :continent,
                region = :region,
                surfacearea = :surfacearea,
                indepyear = :indepyear,
                population = :population,
                lifeexpectancy = :lifeexpectancy,
                gnp = :gnp,
                gnpold = :gnpold,
                localname = :localname,
                governmentform = :governmentform,
                headofstate = :headofstate,
                capital = :capital,
                code2 = :code2
            WHERE code = '$code1'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':code', $code);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':continent', $continent);
        $stmt->bindParam(':region', $region);
        $stmt->bindParam(':surfacearea', $surfacearea);
        $stmt->bindParam(':indepyear', $indepyear);
        $stmt->bindParam(':population', $population);
        $stmt->bindParam(':lifeexpectancy', $lifeexpectancy);
        $stmt->bindParam(':gnp', $gnp);
        $stmt->bindParam(':gnpold', $gnpold);
        $stmt->bindParam(':localname', $localname);
        $stmt->bindParam(':governmentform', $governmentform);
        $stmt->bindParam(':headofstate', $headofstate);
        $stmt->bindParam(':capital', $capital);
        $stmt->bindParam(':code2', $code2);

        $stmt->execute();

        echo '{"notice": {"text": "Country Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Delete Country
$app->delete('/api/country/delete/{code}' , function(Request $request, Response $response){
    $code = $request->getAttribute('code');
    
    $sql = "DELETE FROM country WHERE code = '$code'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Country Deleted"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});