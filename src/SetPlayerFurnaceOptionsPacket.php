<?php

namespace pocketmine\network\mcpe\protocol;

use pmmp\encoding\Byte;
use pmmp\encoding\ByteBufferReader;
use pmmp\encoding\ByteBufferWriter;
use pocketmine\network\mcpe\protocol\types\inventory\FurnaceOptions;

class SetPlayerFurnaceOptionsPacket extends DataPacket implements ServerboundPacket, ClientboundPacket {
	public const NETWORK_ID = ProtocolInfo::SET_PLAYER_FURNACE_OPTIONS_PACKET;

	public int $furnaceType;
	public FurnaceOptions $options;

	public static function create(int $furnaceType, FurnaceOptions $options): self{
		$result = new self();
		$result->furnaceType = $furnaceType;
		$result->options = $options;
		return $result;
	}

	public function decodePayload(ByteBufferReader $in) : void {
		$this->furnaceType = Byte::readUnsigned($in);
		$this->options = FurnaceOptions::decode($in);
	}

	public function encodePayload($out) : void {
		Byte::writeUnsigned($out, $this->furnaceType);
		$this->options->encode($out);
	}

	public function handle(PacketHandlerInterface $handler) : bool{
		return $handler->handleSetPlayerFurnaceOptions($this);
	}
}