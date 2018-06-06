<?php
namespace App\Service;

class JobinderResearch
{

	private function getAccessToken()
	{
		$id = 'PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc';
		$secretKey = '7cea572bfe4721915135fa22213b9805172a066bbb667314d3ecdb82be5f5259';
		$url = 'https://authentification-candidat.pole-emploi.fr/connexion/oauth2/access_token?realm=partenaire';

		$post = [
    	'grant_type' => 'client_credentials',
    	'client_id'   => $id,
    	'client_secret' => $secretKey,
    	'scope' => 'api_infotravailv1',
		];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$url);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

		$response = curl_exec($curl);
		curl_close($curl);

		$parsedResponse = json_decode($response);
		$accessToken = $parsedResponse
	}

	public function getJobs(Recherche $recherche)
	{

		$token = getAccessToken();
		$job = $recherche->getJob();
		$city = $recherche->getCity();

		$url = 'http://....param='.$job.'...param='.$city.'';
		$raw = file_get_contents($url);
		$json = json_decode($raw);
		return $json;
	}
}