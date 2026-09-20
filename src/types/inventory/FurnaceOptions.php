<?php

/*
 * This file is part of BedrockProtocol.
 * Copyright (C) 2014-2022 PocketMine Team <https://github.com/pmmp/BedrockProtocol>
 *
 * BedrockProtocol is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 */

declare(strict_types=1);

namespace pocketmine\network\mcpe\protocol\types\inventory;

use pmmp\encoding\ByteBufferReader;
use pmmp\encoding\ByteBufferWriter;
use pmmp\encoding\VarInt;
use pocketmine\network\mcpe\protocol\PacketDecodeException;
use pocketmine\network\mcpe\protocol\serializer\CommonTypes;

final class FurnaceOptions{
	public function __construct(
		private FurnaceLeftTabIndex $leftTab,
		private bool $filtering,
		private FurnaceLayout $layout
	){}

	public function getLeftTab() : FurnaceLeftTabIndex { return $this->leftTab; }

	public function isFiltering() : bool { return $this->filtering; }

	public function getLayout() : FurnaceLayout { return $this->layout; }

	public static function decode(ByteBufferReader $in) : self{
		$leftTabRaw = VarInt::readUnsignedInt($in);
		$leftTab = FurnaceLeftTabIndex::tryFrom($leftTabRaw) ?? throw new PacketDecodeException("Unknown furnace left tab index $leftTabRaw");

		$filtering = CommonTypes::getBool($in);

		$layoutRaw = VarInt::readUnsignedInt($in);
		$layout = FurnaceLayout::tryFrom($layoutRaw) ?? throw new PacketDecodeException("Unknown furnace layout $layoutRaw");

		return new self($leftTab, $filtering, $layout);
	}

	public function encode(ByteBufferWriter $out) : void{
		VarInt::writeUnsignedInt($out, $this->leftTab->value);
		CommonTypes::putBool($out, $this->filtering);
		VarInt::writeUnsignedInt($out, $this->layout->value);
	}

}
