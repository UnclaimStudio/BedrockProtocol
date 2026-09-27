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

namespace pocketmine\network\mcpe\protocol\types;

use pmmp\encoding\Byte;
use pmmp\encoding\ByteBufferReader;
use pmmp\encoding\ByteBufferWriter;
use pmmp\encoding\LE;
use pocketmine\network\mcpe\protocol\PacketDecodeException;

final class MemoryCategoryCounter{

	public function __construct(
		private MemoryCategory $category,
		private int $bytes
	){}

	public function getCategory() : MemoryCategory{ return $this->category; }

	public function getBytes() : int{ return $this->bytes; }

	public static function read(ByteBufferReader $in) : self{
		$categoryId = Byte::readUnsigned($in);
		$category = MemoryCategory::tryFrom($categoryId) ?? throw new PacketDecodeException("Unknown memory category $categoryId");
		$bytes = LE::readUnsignedLong($in);

		return new self(
			$category,
			$bytes
		);
	}

	public function write(ByteBufferWriter $out) : void{
		Byte::writeUnsigned($out, $this->category->value);
		LE::writeUnsignedLong($out, $this->bytes);
	}
}
