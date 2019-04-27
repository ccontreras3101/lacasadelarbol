<?php

namespace app\controllers;

use Yii;
use app\models\Mesas;
use app\models\TbProductos;
use app\models\TbComandas;
use app\models\TbClientes;
use app\models\TbUsuarios;
use app\models\TbCafe;
use app\models\TbCocina;
use app\models\TbMesas;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
/**
 * ReportesController implements.
 */
class ReportesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TbCocina models.
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index');
    }
}
