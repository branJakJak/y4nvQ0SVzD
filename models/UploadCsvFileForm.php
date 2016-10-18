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
        $sqlCommand = <<<EOL
        LOAD DATA LOCAL INFILE "%s"
        INTO TABLE person_info
        FIELDS TERMINATED BY "%s"
        LINES TERMINATED BY "%s"
        IGNORE 0 LINES
        (title , firstname , lastname , mobilenumber , telephone , flatNumber , address , address1 , address2 , address3 , address4 , address5 , postcode , amount , reasonForLoan , emailAddress , dateOfBirth);
EOL;
        /*create temp file to data*/
        $myTemp = \Yii::getAlias("@app/data").DIRECTORY_SEPARATOR.uniqid();
        touch($myTemp);
        file_put_contents($myTemp, file_get_contents($this->csvFile));
        $tempContainerArr = explode("=", Yii::$app->db->dsn);
        $databaseName = end( $tempContainerArr  );
        $databaseUsername = Yii::$app->db->username;
        $databasePassword = Yii::$app->db->password;
        $sqlCommand = sprintf($sqlCommand, $myTemp, ',', '\n');

        $mainCommand="";
        if (YII_DEBUG) {
            $mainCommand = "mysql --local-infile --user=$databaseUsername --password=$databasePassword --database=$databaseName -e '$sqlCommand'";
        }else{
            $mainCommand = "mysql  --local-infile --login-path=import_local --database=cut8_records -e '$sqlCommand'";
        }
        exec($mainCommand);
        unlink($myTemp);
        \Yii::warning($sqlCommand);
        \Yii::warning($mainCommand);
    }
}