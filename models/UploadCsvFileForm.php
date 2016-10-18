<?php 

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadCsvFileForm
*/
class UploadCsvFileForm extends Model
{
	// Path of the csv file in the temp directory
	public $csvFile;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['csvFile'], 'required'],
    ];
    }	
    public function attributeLabels()
    {
    	return [
    		'csvFile'=>'CSV File',
    	];
    }
    public function import()
    {
        $this->planB();
    	//open csv file , 
    	// $fileRes = fopen($this->csvFile, "r+");
    	// $dataCollection = [];
    	// while (!feof($fileRes)) {
    	// 	$currentCsvLine = fgetcsv($fileRes);
     //        $dataCollection[] = [
     //             $currentCsvLine[0],
     //             $currentCsvLine[1],
     //             $currentCsvLine[2],
     //             $currentCsvLine[3],
     //             $currentCsvLine[4],
     //             $currentCsvLine[5],
     //             $currentCsvLine[6],
     //             $currentCsvLine[7],
     //             $currentCsvLine[8],
     //             $currentCsvLine[9],
     //             $currentCsvLine[10],
     //             $currentCsvLine[11],
     //             $currentCsvLine[12],
     //             $currentCsvLine[13],
     //             $currentCsvLine[14],
     //             $currentCsvLine[15],
     //             $currentCsvLine[16]
     //        ];

    	// }
    	// fclose($fileRes);
    	// //build batch insert
     //    Yii::$app
     //    ->db
     //    ->createCommand()
     //    ->batchInsert(
     //        \app\models\PersonInformation::tableName() , 
     //        [
     //            'title' ,
     //            'firstname' ,
     //            'lastname' ,
     //            'mobilenumber' ,
     //            'telephone' ,
     //            'flatNumber' ,
     //            'address' ,
     //            'address1' ,
     //            'address2' ,
     //            'address3' ,
     //            'address4' ,
     //            'address5' ,
     //            'postcode' ,
     //            'amount' ,
     //            'reasonForLoan' ,
     //            'emailAddress' ,
     //            'dateOfBirth'
     //        ],
     //        $dataCollection
     //    )
     //    ->execute();
    	//execute 
    	//done
    	//title , firstname , lastname , mobilenumber , telephone , flatNumber , address , address1 , address2 , address3 , address4 , address5 , postcode , amount , reasonForLoan , emailAddress , dateOfBirth
    }
    public function planB()
    {
//     	/*import here*/
        $sqlCommand = <<<EOL
    	LOAD DATA LOCAL INFILE "%s"
    	INTO TABLE person_info
    	FIELDS TERMINATED BY "%s"
    	LINES TERMINATED BY "%s"
    	IGNORE 0 LINES
    	(title , firstname , lastname , mobilenumber , telephone , flatNumber , address , address1 , address2 , address3 , address4 , address5 , postcode , amount , reasonForLoan , emailAddress , dateOfBirth)
EOL;
		$tempContainerArr = explode("=", Yii::$app->db->dsn);
        $databaseName = end( $tempContainerArr  );
		$databaseUsername = Yii::$app->db->username;
		$databasePassword = Yii::$app->db->password;
        $sqlCommand = sprintf($sqlCommand, $this->csvFile, ',', '\n');


        if (YII_DEBUG) {
            $mainCommand = "mysql --local-infile --user=$databaseUsername --password=$databasePassword --database=$databaseName -e '$sqlCommand'";
        }else{
            $mainCommand = "mysql --login-path=import_local --database=cut8_records -e '$sqlCommand'";
        }
        $ret = shell_exec($mainCommand);
        \Yii::warning($ret);
        \Yii::warning($sqlCommand);
        \Yii::warning($mainCommand);

    	//insert in the database
    	// done
    	# code...
    }

}