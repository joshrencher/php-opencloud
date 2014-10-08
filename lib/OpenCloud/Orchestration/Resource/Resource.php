<?php
/**
 * Copyright 2012-2014 Rackspace US, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace OpenCloud\Orchestration\Resource;

use OpenCloud\Common\Resource\ReadOnlyResource;

/**
 *
 */
class Resource extends ReadOnlyResource
{
    protected static $url_resource = 'resources';
    protected static $json_name = 'resource';

    protected $name;
    protected $description;
    protected $status;
    protected $statusReason;
    protected $logicalId;
    protected $physicalId;
    protected $requiredBy;
    protected $updatedTime;
    protected $type;

    protected $aliases = array(
        'resource_name' => 'name',
        'resource_status' => 'status',
        'resource_status_reason' => 'statusReason',
        'logical_resource_id' => 'logicalId',
        'physical_resource_id' => 'physicalId',
        'required_by' => 'requiredBy',
        'updated_time' => 'updatedTime',
        'resource_type' => 'type'
    );

    public function primaryKeyField()
    {
        return 'name';
    }

    public function getMetadata()
    {
        $metadataUrl = $this->metadataUrl();
        $response = $this->getClient()->get($metadataUrl)->send();
        return json_decode($response->getBody(true));
    }

    protected function metadataUrl()
    {
        return $this->getParent()->url('metadata');
    }
}
