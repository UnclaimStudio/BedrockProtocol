<?php

namespace pocketmine\network\mcpe\protocol\types\inventory;


use pmmp\encoding\ByteBufferReader;
use pmmp\encoding\ByteBufferWriter;
use pmmp\encoding\VarInt;
use pocketmine\network\mcpe\protocol\serializer\CommonTypes;

final class FurnaceOptions{
	/**
	 * @var FurnaceLeftTabIndex $leftTab
	 * @var bool $filtering
	 * @var FurnaceLayout $layout
	 */
	public function __construct(
		private FurnaceLeftTabIndex $leftTab,
		private bool $filtering,
		private FurnaceLayout $layout
	){}

	public function getLeftTab() : FurnaceLeftTabIndex { return $this->leftTab; }

	public function isFiltering() : bool { return $this->filtering; }

	public function getLayout() : FurnaceLayout { return $this->layout; }


	public static function decode(ByteBufferReader $in) : self{
		$leftTab = VarInt::readUnsignedInt($in);
		$filtering = CommonTypes::getBool($in);
		$layout = VarInt::readUnsignedInt($in);

		return new self($leftTab, $filtering, $layout);
	}

	public function encode(ByteBufferWriter $out) : void{
		VarInt::writeUnsignedInt($out, $this->leftTab);
		CommonTypes::putBool($out, $this->filtering);
		VarInt::writeUnsignedInt($out, $this->layout);
	}

}