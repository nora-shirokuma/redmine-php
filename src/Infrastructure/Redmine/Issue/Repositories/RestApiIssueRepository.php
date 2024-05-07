<?php

namespace NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\Repositories;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use NoraShirokuma\RedminePhp\Domain\Redmine\Issue\IssueRepository;
use NoraShirokuma\RedminePhp\Domain\Redmine\RestApi\ApiKey;
use NoraShirokuma\RedminePhp\Domain\Redmine\RestApi\BaseUrl;
use NoraShirokuma\RedminePhp\Infrastructure\Redmine\Issue\CreateIssue\CreateIssueRequest;

class RestApiIssueRepository implements IssueRepository
{
    private const TIMEOUT = 600;

    private const RETRY_TIMES = 5;

    private const RETRY_SLEEP = 100;

    private BaseUrl $baseUrl;

    private ApiKey $apiKey;

    public function __construct(BaseUrl $baseUrl, ApiKey $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function create(CreateIssueRequest $request): bool
    {
        $client = new Client();

        $url = sprintf(
            '%s%s',
            (string)$this->baseUrl,
            '/issues.json'
        );

        $headers = [
            'X-Redmine-API-Key' => (string)$this->apiKey,
            'Content-Type' => 'application/json',
        ];

        $params = [];

        if (!$request->getSubject()->isNull()) {
            $params['issue']['subject'] = (string)$request->getSubject();
        }

        if (!$request->getDescription()->isNull()) {
            $params['issue']['description'] = (string)$request->getDescription();
        }

        if (!$request->getCategoryId()->isNull()) {
            $params['issue']['category_id'] = (string)$request->getCategoryId();
        }

        if (!$request->getDueDate()->isNull()) {
            $params['issue']['due_date'] = (string)$request->getDueDate();
        }

        if (!$request->getProjectId()->isNull()) {
            $params['issue']['project_id'] = (string)$request->getProjectId();
        }

        if (!$request->getStartDate()->isNull()) {
            $params['issue']['start_date'] = (string)$request->getStartDate();
        }

        if (!$request->getTrackerId()->isNull()) {
            $params['issue']['tracker_id'] = (string)$request->getTrackerId();
        }

        $options = [
            'headers' => $headers,
            'timeout' => self::TIMEOUT,
            'retry'   => [
                'max'     => self::RETRY_TIMES,
                'delay'   => self::RETRY_SLEEP,
            ],
            'json' => $params,
        ];

        try {
            $response = $client->request('post', $url, $options);
            echo $response->getBody();
        } catch (RequestException $e) {
            throw new Exception('[ERROR] ', $e->getCode(), $e);
        }

        return true;
    }
}