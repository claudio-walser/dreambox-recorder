<?php
/**
 * Todo: generate in orm maybe? Implement ACL for json clients here maybe?
 * Same controller returns different dto's containg more or less data, depending on the client
 * acl could be defined in xml where database is described... 
 * Just thinking and try to dont forget soon...
 */
namespace DreamboxRecorder\Dto;

class Channel extends AbstractDto {

	protected $name = '';
	protected $reference = '';

}
?>