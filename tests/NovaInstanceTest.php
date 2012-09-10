<?php
// (c)2012 Rackspace Hosting
// See COPYING for licensing information

require_once('stub_conn.inc');
require_once('compute.inc');
require_once('novainstance.inc');

// make a real class from the abstract one
class MyNovaInstance extends OpenCloud\Compute\NovaInstance {
	public
		$status,
		$updated,
		$hostId,
		$addresses,
		$links,
		$image,
		$flavor,
		$id,
		$user_id,
		$name,
		$created,
		$tenant_id,
		$accessIPv4,
		$accessIPv6,
		$progress,
		$adminPass,
		$metadata;
	public function Refresh($id) { return parent::Refresh($id); }
}

class NovaInstanceTest extends PHPUnit_Framework_TestCase
{
	private
		$instance;
	public function __construct() {
		$conn = new StubConnection('http://example.com', 'SECRET');
		$service = new OpenCloud\Compute(
			$conn,
			'cloudServersOpenStack',
			'DFW',
			'publicURL'
		);
		$this->instance = new MyNovaInstance($service);
	}

	/**
	 * Tests
	 */


	/**
	 * @expectedException OpenCloud\DocumentError
	 */
	public function testRefresh() {
	    $this->instance->Refresh('SERVER-ID');
	    $this->assertEquals('ACTIVE', $this->instance->status);
	}
}