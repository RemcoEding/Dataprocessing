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
        if ($world == false){
            echo 'ERROR 404 Country not found';
        }
        else{
            echo json_encode($world);
        }

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Add Country
$app->post('/api/country/add' , function(Request $request, Response $response){
    $Code = $request->getParam('Code');
    $Name = $request->getParam('Name');
    $Continent = $request->getParam('Continent');
    $Region = $request->getParam('Region');
    $SurfaceArea = $request->getParam('SurfaceArea');
    $IndepYear = $request->getParam('IndepYear');
    $Population = $request->getParam('Population');
    $LifeExpectancy = $request->getParam('LifeExpectancy');
    $GNP = $request->getParam('GNP');
    $GNPOld = $request->getParam('GNPOld');
    $LocalName = $request->getParam('LocalName');
    $GovernmentForm = $request->getParam('GovernmentForm');
    $HeadOfState = $request->getParam('HeadOfState');
    $Capital = $request->getParam('Capital');
    $Code2 = $request->getParam('Code2');

    
    $sql = "INSERT INTO country (Code,Name,Continent,Region,SurfaceArea,IndepYear,Population,LifeExpectancy,GNP,GNPOld,LocalName,GovernmentForm,HeadOfState,Capital,Code2) VALUES
    (:Code,:Name,:Continent,:Region,:SurfaceArea,:IndepYear,:Population,:LifeExpectancy,:GNP,:GNPOld,:LocalName,:GovernmentForm,:HeadOfState,:Capital,:Code2)";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam('Code', $Code);
        $stmt->bindParam('Name', $Name);
        $stmt->bindParam('Continent', $Continent);
        $stmt->bindParam('Region', $Region);
        $stmt->bindParam('SurfaceArea', $SurfaceArea);
        $stmt->bindParam('IndepYear', $IndepYear);
        $stmt->bindParam('Population', $Population);
        $stmt->bindParam('LifeExpectancy', $LifeExpectancy);
        $stmt->bindParam('GNP', $GNP);
        $stmt->bindParam('GNPOld', $GNPOld);
        $stmt->bindParam('LocalName', $LocalName);
        $stmt->bindParam('GovernmentForm', $GovernmentForm);
        $stmt->bindParam('HeadOfState', $HeadOfState);
        $stmt->bindParam('Capital', $Capital);
        $stmt->bindParam('Code2', $Code2);

        $stmt->execute();

        echo '{"notice": {"text": "Country Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Country
$app->put('/api/country/update/{Code1}' , function(Request $request, Response $response){
    $Code1 = $request->getAttribute('Code1');
    $Code = $request->getParam('Code');
    $Name = $request->getParam('Name');
    $Continent = $request->getParam('Continent');
    $Region = $request->getParam('Region');
    $SurfaceArea = $request->getParam('SurfaceArea');
    $IndepYear = $request->getParam('IndepYear');
    $Population = $request->getParam('Population');
    $LifeExpectancy = $request->getParam('LifeExpectancy');
    $GNP = $request->getParam('GNP');
    $GNPOld = $request->getParam('GNPOld');
    $LocalName = $request->getParam('LocalName');
    $GovernmentForm = $request->getParam('GovernmentForm');
    $HeadOfState = $request->getParam('HeadOfState');
    $Capital = $request->getParam('Capital');
    $Code2 = $request->getParam('Code2');

    
    $sql = "UPDATE country SET
                Code = :Code,
                Name = :Name,
                Continent = :Continent,
                Region = :Region,
                SurfaceArea = :SurfaceArea,
                IndepYear = :IndepYear,
                Population = :Population,
                LifeExpectancy = :LifeExpectancy,
                GNP = :GNP,
                GNPOld = :GNPOld,
                LocalName = :LocalName,
                GovernmentForm = :GovernmentForm,
                HeadOfState = :HeadOfState,
                Capital = :Capital,
                Code2 = :Code2
            WHERE Code = '$Code1'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':Code', $Code);
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Continent', $Continent);
        $stmt->bindParam(':Region', $Region);
        $stmt->bindParam(':SurfaceArea', $SurfaceArea);
        $stmt->bindParam(':IndepYear', $IndepYear);
        $stmt->bindParam(':Population', $Population);
        $stmt->bindParam(':LifeExpectancy', $LifeExpectancy);
        $stmt->bindParam(':GNP', $GNP);
        $stmt->bindParam(':GNPOld', $GNPOld);
        $stmt->bindParam(':LocalName', $LocalName);
        $stmt->bindParam(':GovernmentForm', $GovernmentForm);
        $stmt->bindParam(':HeadOfState', $HeadOfState);
        $stmt->bindParam(':Capital', $Capital);
        $stmt->bindParam(':Code2', $Code2);

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

// Get All City
$app->get('/api/city' , function(Request $request, Response $response){
    $sql = "SELECT * FROM city";

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

// Get Single City
$app->get('/api/city/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    
    $sql = "SELECT * FROM city WHERE ID = '$ID'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $world = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($world == false){
            echo 'ERROR 404 City not found';
        }
        else{
            echo json_encode($world);
        }

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Add City
$app->post('/api/city/add' , function(Request $request, Response $response){
    $ID = $request->getParam('ID');
    $Name = $request->getParam('Name');
    $CountryCode = $request->getParam('CountryCode');
    $District = $request->getParam('District');
    $Population = $request->getParam('Population');

    
    $sql = "INSERT INTO city (ID,Name,CountryCode,District,Population) VALUES
    (:ID,:Name,:CountryCode,:District,:Population)";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam('ID', $ID);
        $stmt->bindParam('Name', $Name);
        $stmt->bindParam('CountryCode', $CountryCode);
        $stmt->bindParam('District', $District);
        $stmt->bindParam('Population', $Population);

        $stmt->execute();

        echo '{"notice": {"text": "City Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update City
$app->put('/api/city/update/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    $Name = $request->getParam('Name');
    $CountryCode = $request->getParam('CountryCode');
    $District = $request->getParam('District');
    $Population = $request->getParam('Population');
    

    
    $sql = "UPDATE city SET
                Name = :Name,
                CountryCode = :CountryCode,
                District = :District,
                Population = :Population
            WHERE ID = $ID";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':CountryCode', $CountryCode);
        $stmt->bindParam(':District', $District);
        $stmt->bindParam(':Population', $Population);

        $stmt->execute();

        echo '{"notice": {"text": "City Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Delete City
$app->delete('/api/city/delete/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    
    $sql = "DELETE FROM city WHERE ID = $ID";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "City Deleted"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Get All Countrylanguage
$app->get('/api/countrylanguage' , function(Request $request, Response $response){
    $sql = "SELECT * FROM countrylanguage";

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

// Get Single Countrylanguage
$app->get('/api/countrylanguage/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    
    $sql = "SELECT * FROM countrylanguage WHERE ID = '$ID'";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $world = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        if ($world == false){
            echo 'ERROR 404 Countrylanguage not found';
        }
        else{
            echo json_encode($world);
        }

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Add Countrylanguage
$app->post('/api/countrylanguage/add' , function(Request $request, Response $response){
    $CountryCode = $request->getParam('CountryCode');
    $Language = $request->getParam('Language');
    $IsOfficial = $request->getParam('IsOfficial');
    $Percentage = $request->getParam('Percentage');

    
    $sql = "INSERT INTO countrylanguage (CountryCode,Language,IsOfficial,Percentage) VALUES
    (:CountryCode,:Language,:IsOfficial,:Percentage)";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam('CountryCode', $CountryCode);
        $stmt->bindParam('Language', $Language);
        $stmt->bindParam('IsOfficial', $IsOfficial);
        $stmt->bindParam('Percentage', $Percentage);

        $stmt->execute();

        echo '{"notice": {"text": "Countrylanguage Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Countrylanguage
$app->put('/api/countrylanguage/update/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    $CountryCode = $request->getParam('CountryCode');
    $Language = $request->getParam('Language');
    $IsOfficial = $request->getParam('IsOfficial');
    $Percentage = $request->getParam('Percentage');
    

    
    $sql = "UPDATE countrylanguage SET
                CountryCode = :CountryCode,
                Language = :Language,
                IsOfficial = :IsOfficial,
                Percentage = :Percentage
            WHERE ID = $ID";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':CountryCode', $CountryCode);
        $stmt->bindParam(':Language', $Language);
        $stmt->bindParam(':IsOfficial', $IsOfficial);
        $stmt->bindParam(':Percentage', $Percentage);

        $stmt->execute();

        echo '{"notice": {"text": "Countrylanguage Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});

// Delete Countrylanguage
$app->delete('/api/countrylanguage/delete/{ID}' , function(Request $request, Response $response){
    $ID = $request->getAttribute('ID');
    
    $sql = "DELETE FROM countrylanguage WHERE ID = $ID";

    try{
        //get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;

        echo '{"notice": {"text": "Countrylanguage Deleted"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }

});
