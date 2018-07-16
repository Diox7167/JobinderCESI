<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Recherche;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="accueil")
     */
    public function accueilAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/accueil.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function aadminAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/membre", name="membre")
     */
    public function membreAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/membre.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/resultats", name="resultats")
     */
    public function resultatsAction(Request $request)
    {

        $recherche = new Recherche();
        $form = $this->createFormBuilder($recherche)
            ->add('city', TextType::class,array('label' => 'City'))
            ->add('job', TextType::class,array('label' => 'Job'))
            ->add('Submit',SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recherche = $form->getData();
            $city = $recherche->getCity();
            $job = $recherche->getJob();
            $region = 11;
            if($city === 'paris'){
                $region = 11;
            }
            if($city === 'rennes'){
                $region = 53;
            }

        $token = $this->getAccessToken();
        $urlJobResearch = 'https://api.emploi-store.fr/partenaire/offresdemploi/v1/rechercheroffres';

        $firstArray = array(
                    "page" => 1,
                    "per_page" => 5,
                    "sort" => 1);

        $secondArray = array(
                    "keywords" => $job,
                    "regionCode" => $region
                    );

        $dataArray = array(
                    "technicalParameters" => $firstArray,
                    "criterias" => $secondArray
                    );

        $data = json_encode($dataArray);


        //$rechercheJob->getJob();
        //$rechercheCity->getCity();
        $certificate_location = 'c:/wamp64/www/cacert.pem';
        $bearerToken = 'Bearer '. $token;
        $header = [
                'Content-Type: application/json',
                'Accept: application/json, application/xml',
                'Authorization: Bearer '. $token
                ];

        $curl = curl_init($urlJobResearch);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //curl_setopt($curl, CURLOPT_CAINFO, $certificate_location);
        //curl_setopt($curl, CURLOPT_CAPATH, $certificate_location);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($result);
        

        


         




















        

        //$path = $this->container->get('assets.packages')->getUrl("bundles/app/js/json_response.json");
        //$content = file_get_contents("bundles/app/js/json_response.json");
        //$response = json_decode($content);
        //var_dump($response);
        //companyName

        $i = 0;
        foreach ($response->results as $results) 
        {
            $jobs[$i]['contractTypeCode'] = $results->contractTypeCode;
            $jobs[$i]['continentCode'] = $results->continentCode;
            $jobs[$i]['gpsLatitude'] = $results->gpsLatitude;
            $jobs[$i]['gpsLongitude'] = $results->gpsLongitude;
            $jobs[$i]['contractDuration'] = $results->continentCode;
            $jobs[$i]['companyName'] = $results->companyName;
            $jobs[$i]['offerId'] = $results->offerId;

            $i++;
        }

       













        /*
        foreach ($response as $key => $value) {
            echo $key." =>";
            var_dump($key);

            //$res = json_encode($value);
            //$response2 = json_decode($res, true);
            //echo $value[$i]->companyName;
            //echo $value[$i]['companyName'];
            //$jobs[]['companyName'] = $value[$i]['companyName'];
            //$jobs[$i]['companyName'] = $value[$i]->companyName;
            //$i++;
        
            $i = 0;
            foreach ($response2 as $key2 => $value2) {
                echo $jobs[$i]['companyName'] = $value2['companyName'];
                $i++;
            }



        }
        */
        return $this->render('default/resultats.html.twig',array ('jobs'=>$jobs, 'form' => $form->createView()));
        }
        //var_dump($json);








        $token = $this->getAccessToken();
        $urlJobResearch = 'https://api.emploi-store.fr/partenaire/offresdemploi/v1/rechercheroffres';

        $firstArray = array(
                    "page" => 1,
                    "per_page" => 5,
                    "sort" => 1);

        $secondArray = array(
                    "keywords" => 'architecte',
                    "regionCode" => '53'
                    );

        $dataArray = array(
                    "technicalParameters" => $firstArray,
                    "criterias" => $secondArray
                    );

        $data = json_encode($dataArray);


        //$rechercheJob->getJob();
        //$rechercheCity->getCity();
        $certificate_location = 'c:/wamp64/www/cacert.pem';
        $bearerToken = 'Bearer '. $token;
        $header = [
                'Content-Type: application/json',
                'Accept: application/json, application/xml',
                'Authorization: Bearer '. $token
                ];

        $curl = curl_init($urlJobResearch);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //curl_setopt($curl, CURLOPT_CAINFO, $certificate_location);
        //curl_setopt($curl, CURLOPT_CAPATH, $certificate_location);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($result);
        

        $i = 0;
        foreach ($response->results as $results) 
        {
            $jobs[$i]['contractTypeCode'] = $results->contractTypeCode;
            $jobs[$i]['continentCode'] = $results->continentCode;
            $jobs[$i]['gpsLatitude'] = $results->gpsLatitude;
            $jobs[$i]['gpsLongitude'] = $results->gpsLongitude;
            $jobs[$i]['contractDuration'] = $results->continentCode;
            $jobs[$i]['companyName'] = $results->companyName;
            $jobs[$i]['offerId'] = $results->offerId;

            $i++;
        }




        // replace this example code with whatever you need
        return $this->render('default/resultats.html.twig',array ('jobs'=>$jobs, 'form' => $form->createView()));
    }





        public function getAccessToken()
         {
                $id = 'PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc';
                $secretKey = '7cea572bfe4721915135fa22213b9805172a066bbb667314d3ecdb82be5f5259';
                $urlAccessToken = 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=%2Fpartenaire';
                //$certificate_location = 'c:/wamp64/www/cacert.pem';

                $header = array(
                'Content-Type' => 'application/x-www-form-urlencoded',
                );


                $post = http_build_query(array(
                'grant_type' => 'client_credentials',
                'client_id'   => $id,
                'client_secret' => $secretKey,
                'scope' => 'application_PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc api_offresdemploiv1 o2dsoffre'
                ));

                $curl = curl_init($urlAccessToken);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
                //curl_setopt($curl, CURLOPT_CAINFO, $certificate_location);
                //curl_setopt($curl, CURLOPT_CAPATH, $certificate_location);
                //curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $result = curl_exec($curl);
                curl_close($curl);
                $parsedResult = json_decode($result);
                $accessToken = $parsedResult->access_token;
                return $accessToken;
        }



    

}
