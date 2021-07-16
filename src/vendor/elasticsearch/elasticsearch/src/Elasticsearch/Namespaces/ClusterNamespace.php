<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
declare(strict_types = 1);

namespace Elasticsearch\Namespaces;

use Elasticsearch\Namespaces\AbstractNamespace;

/**
 * Class ClusterNamespace
 *
 * NOTE: this file is autogenerated using util/GenerateEndpoints.php
 * and Elasticsearch 7.13.1 (9a7758028e4ea59bcab41c12004603c5a7dd84a9)
 */
class ClusterNamespace extends AbstractNamespace
{

    /**
     * Provides explanations for shard allocations in the cluster.
     *
     * $params['include_yes_decisions'] = (boolean) Return 'YES' decisions in explanation (default: false)
     * $params['include_disk_info']     = (boolean) Return information about disk usage and shard sizes (default: false)
     * $params['body']                  = (array) The index, shard, and primary flag to explain. Empty means 'explain the first unassigned shard'
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-allocation-explain.html
     */
    public function allocationExplain(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\AllocationExplain');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Deletes a component template
     *
     * $params['name']           = (string) The name of the template
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
     */
    public function deleteComponentTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\DeleteComponentTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
    /**
     * Clears cluster voting config exclusions.
     *
     * $params['wait_for_removal'] = (boolean) Specifies whether to wait for all excluded nodes to be removed from the cluster before clearing the voting configuration exclusions list. (Default = true)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/voting-config-exclusions.html
     */
    public function deleteVotingConfigExclusions(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\DeleteVotingConfigExclusions');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns information about whether a particular component template exist
     *
     * $params['name']           = (string) The name of the template
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return bool
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
     */
    public function existsComponentTemplate(array $params = []): bool
    {
        $name = $this->extractArgument($params, 'name');

        // manually make this verbose so we can check status code
        $params['client']['verbose'] = true;

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\ExistsComponentTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return BooleanRequestWrapper::performRequest($endpoint, $this->transport);
    }
    /**
     * Returns one or more component templates
     *
     * $params['name']           = (list) The comma separated names of the component templates
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
     */
    public function getComponentTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\GetComponentTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns cluster settings.
     *
     * $params['flat_settings']    = (boolean) Return settings in flat format (default: false)
     * $params['master_timeout']   = (time) Explicit operation timeout for connection to master node
     * $params['timeout']          = (time) Explicit operation timeout
     * $params['include_defaults'] = (boolean) Whether to return all default clusters setting. (Default = false)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-get-settings.html
     */
    public function getSettings(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\GetSettings');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns basic information about the health of the cluster.
     *
     * $params['index']                           = (list) Limit the information returned to a specific index
     * $params['expand_wildcards']                = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = all)
     * $params['level']                           = (enum) Specify the level of detail for returned information (Options = cluster,indices,shards) (Default = cluster)
     * $params['local']                           = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout']                  = (time) Explicit operation timeout for connection to master node
     * $params['timeout']                         = (time) Explicit operation timeout
     * $params['wait_for_active_shards']          = (string) Wait until the specified number of shards is active
     * $params['wait_for_nodes']                  = (string) Wait until the specified number of nodes is available
     * $params['wait_for_events']                 = (enum) Wait until all currently queued events with the given priority are processed (Options = immediate,urgent,high,normal,low,languid)
     * $params['wait_for_no_relocating_shards']   = (boolean) Whether to wait until there are no relocating shards in the cluster
     * $params['wait_for_no_initializing_shards'] = (boolean) Whether to wait until there are no initializing shards in the cluster
     * $params['wait_for_status']                 = (enum) Wait until cluster is in a specific state (Options = green,yellow,red)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-health.html
     */
    public function health(array $params = [])
    {
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\Health');
        $endpoint->setParams($params);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns a list of any cluster-level changes (e.g. create index, update mapping,allocate or fail shard) which have not yet been executed.
     *
     * $params['local']          = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-pending.html
     */
    public function pendingTasks(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\PendingTasks');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Updates the cluster voting config exclusions by node ids or node names.
     *
     * $params['node_ids']   = (string) A comma-separated list of the persistent ids of the nodes to exclude from the voting configuration. If specified, you may not also specify ?node_names.
     * $params['node_names'] = (string) A comma-separated list of the names of the nodes to exclude from the voting configuration. If specified, you may not also specify ?node_ids.
     * $params['timeout']    = (time) Explicit operation timeout (Default = 30s)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/voting-config-exclusions.html
     */
    public function postVotingConfigExclusions(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\PostVotingConfigExclusions');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Creates or updates a component template
     *
     * $params['name']           = (string) The name of the template
     * $params['create']         = (boolean) Whether the index template should only be added if new or can also replace an existing one (Default = false)
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['master_timeout'] = (time) Specify timeout for connection to master
     * $params['body']           = (array) The template definition (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/indices-component-template.html
     */
    public function putComponentTemplate(array $params = [])
    {
        $name = $this->extractArgument($params, 'name');
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\PutComponentTemplate');
        $endpoint->setParams($params);
        $endpoint->setName($name);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Updates the cluster settings.
     *
     * $params['flat_settings']  = (boolean) Return settings in flat format (default: false)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['body']           = (array) The settings to be updated. Can be either `transient` or `persistent` (survives cluster restart). (Required)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-update-settings.html
     */
    public function putSettings(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\PutSettings');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns the information about configured remote clusters.
     *
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-remote-info.html
     */
    public function remoteInfo(array $params = [])
    {

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\RemoteInfo');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }
    /**
     * Allows to manually change the allocation of individual shards in the cluster.
     *
     * $params['dry_run']        = (boolean) Simulate the operation only and return the resulting state
     * $params['explain']        = (boolean) Return an explanation of why the commands can or cannot be executed
     * $params['retry_failed']   = (boolean) Retries allocation of shards that are blocked due to too many subsequent allocation failures
     * $params['metric']         = (list) Limit the information returned to the specified metrics. Defaults to all but metadata (Options = _all,blocks,metadata,nodes,routing_table,master_node,version)
     * $params['master_timeout'] = (time) Explicit operation timeout for connection to master node
     * $params['timeout']        = (time) Explicit operation timeout
     * $params['body']           = (array) The definition of `commands` to perform (`move`, `cancel`, `allocate`)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-reroute.html
     */
    public function reroute(array $params = [])
    {
        $body = $this->extractArgument($params, 'body');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\Reroute');
        $endpoint->setParams($params);
        $endpoint->setBody($body);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns a comprehensive information about the state of the cluster.
     *
     * $params['metric']                    = (list) Limit the information returned to the specified metrics
     * $params['index']                     = (list) A comma-separated list of index names; use `_all` or empty string to perform the operation on all indices
     * $params['local']                     = (boolean) Return local information, do not retrieve the state from master node (default: false)
     * $params['master_timeout']            = (time) Specify timeout for connection to master
     * $params['flat_settings']             = (boolean) Return settings in flat format (default: false)
     * $params['wait_for_metadata_version'] = (number) Wait for the metadata version to be equal or greater than the specified metadata version
     * $params['wait_for_timeout']          = (time) The maximum time to wait for wait_for_metadata_version before timing out
     * $params['ignore_unavailable']        = (boolean) Whether specified concrete indices should be ignored when unavailable (missing or closed)
     * $params['allow_no_indices']          = (boolean) Whether to ignore if a wildcard indices expression resolves into no concrete indices. (This includes `_all` string or when no indices have been specified)
     * $params['expand_wildcards']          = (enum) Whether to expand wildcard expression to concrete indices that are open, closed or both. (Options = open,closed,hidden,none,all) (Default = open)
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-state.html
     */
    public function state(array $params = [])
    {
        $metric = $this->extractArgument($params, 'metric');
        $index = $this->extractArgument($params, 'index');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\State');
        $endpoint->setParams($params);
        $endpoint->setMetric($metric);
        $endpoint->setIndex($index);

        return $this->performRequest($endpoint);
    }
    /**
     * Returns high-level overview of cluster statistics.
     *
     * $params['node_id']       = (list) A comma-separated list of node IDs or names to limit the returned information; use `_local` to return information from the node you're connecting to, leave empty to get information from all nodes
     * $params['flat_settings'] = (boolean) Return settings in flat format (default: false)
     * $params['timeout']       = (time) Explicit operation timeout
     *
     * @param array $params Associative array of parameters
     * @return array
     * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/cluster-stats.html
     */
    public function stats(array $params = [])
    {
        $node_id = $this->extractArgument($params, 'node_id');

        $endpointBuilder = $this->endpoints;
        $endpoint = $endpointBuilder('Cluster\Stats');
        $endpoint->setParams($params);
        $endpoint->setNodeId($node_id);

        return $this->performRequest($endpoint);
    }
}
