<?php
namespace App\Service;

class JobinderResearch
{

	private function getAccessToken()
	{
		$id = 'PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc';
		$secretKey = '7cea572bfe4721915135fa22213b9805172a066bbb667314d3ecdb82be5f5259';
		$urlAccessToken = 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=%2Fpartenaire';

		$post = [
    	'grant_type' => 'client_credentials',
    	'client_id'   => $id,
    	'client_secret' => $secretKey,
    	'scope' => 'application_PAR_jobinder_0177f48ab1c53cf82653eb0bdb87104e7c12fc084019ae41139e2e709d92c6bc%20api_infotravailv1',
		];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$urlAccessToken);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

		$result = curl_exec($curl);
		curl_close($curl);

		$parsedResponse = json_decode($result);
		$accessToken = $parsedResponse->{'response'}->{'access_token'};
		return $accessToken;
	}

	public function getJobs(Recherche $recherche)
	{
		$token = getAccessToken();
		$urlJobResearch = 'https://api.emploi-store.fr/partenaire/offresdemploi/v1/rechercheroffres';
		$firstArray = array(
					'page' => 5,
					'per_page' => 20,
					'sort' => 1
					);

		$secondArray = array(
					'keywords' => $recherche->getJob(),
					'cityCode' ==> $recherche->getCity()
					);

		$data = array(
    			'technicalParameters' => $firstArray,
    			'criterias' => $secondArray
				);

		$payload = json_encode($data);

		$header = array(
				'Content-Type' => 'application/json'
				'Authorization' => 'Bearer '.$token
				);

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,$urlJobResearch);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

		$result = curl_exec($curl);
		curl_close($curl);
		$resultParsed = json_decode($result);
		return $resultParsed;
	}
}