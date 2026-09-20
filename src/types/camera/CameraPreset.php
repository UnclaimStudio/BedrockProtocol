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

namespace pocketmine\network\mcpe\protocol\types\camera;

use pmmp\encoding\Byte;
use pmmp\encoding\ByteBufferReader;
use pmmp\encoding\ByteBufferWriter;
use pmmp\encoding\LE;
use pocketmine\math\Vector2;
use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\serializer\CommonTypes;
use pocketmine\network\mcpe\protocol\types\ControlScheme;

final class CameraPreset{
	public const AUDIO_LISTENER_TYPE_CAMERA = 0;
	public const AUDIO_LISTENER_TYPE_PLAYER = 1;

	public function __construct(
		private string $name,
		private string $parent,
		private float $xPosition,
		private float $yPosition,
		private float $zPosition,
		private float $pitch,
		private float $yaw,
		private float $rotationSpeed,
		private bool $snapToTarget,
		private Vector2 $horizontalRotationLimit,
		private Vector2 $verticalRotationLimit,
		private bool $continueTargeting,
		private float $blockListeningRadius,
		private Vector2 $viewOffset,
		private Vector3 $entityOffset,
		private float $radius,
		private float $yawLimitMin,
		private float $yawLimitMax,
		private int $audioListenerType,
		private bool $playerEffects,
		private CameraPresetAimAssist $aimAssist,
		private ControlScheme $controlScheme,
		private bool $applyInheritedStartingRotation,
		private Vector2 $startingRotation,
	){}

	public function getName() : string{ return $this->name; }

	public function getParent() : string{ return $this->parent; }

	public function getXPosition() : float{ return $this->xPosition; }

	public function getYPosition() : float{ return $this->yPosition; }

	public function getZPosition() : float{ return $this->zPosition; }

	public function getPitch() : float{ return $this->pitch; }

	public function getYaw() : float{ return $this->yaw; }

	public function getRotationSpeed() : float { return $this->rotationSpeed; }

	public function getSnapToTarget() : bool { return $this->snapToTarget; }

	public function getHorizontalRotationLimit() : Vector2{ return $this->horizontalRotationLimit; }

	public function getVerticalRotationLimit() : Vector2{ return $this->verticalRotationLimit; }

	public function getContinueTargeting() : bool{ return $this->continueTargeting; }

	public function getBlockListeningRadius() : float{ return $this->blockListeningRadius; }

	public function getViewOffset() : Vector2{ return $this->viewOffset; }

	public function getEntityOffset() : Vector3{ return $this->entityOffset; }

	public function getRadius() : float{ return $this->radius; }

	public function getYawLimitMin() : float{ return $this->yawLimitMin; }

	public function getYawLimitMax() : float{ return $this->yawLimitMax; }

	public function getAudioListenerType() : int{ return $this->audioListenerType; }

	public function getPlayerEffects() : bool{ return $this->playerEffects; }

	public function getAimAssist() : CameraPresetAimAssist{ return $this->aimAssist; }

	public function getControlScheme() : ControlScheme{ return $this->controlScheme; }

	public function isApplyInheritedStartingRotation() : bool{
		return $this->applyInheritedStartingRotation;
	}

	public function getStartingRotation() : Vector2{
		return $this->startingRotation;
	}

	public static function read(ByteBufferReader $in) : self{
		$name = CommonTypes::getString($in);
		$parent = CommonTypes::getString($in);
		$xPosition = LE::readFloat($in);
		$yPosition = LE::readFloat($in);
		$zPosition = LE::readFloat($in);
		$pitch = LE::readFloat($in);
		$yaw = LE::readFloat($in);
		$rotationSpeed = LE::readFloat($in);
		$snapToTarget = CommonTypes::getBool($in);
		$horizontalRotationLimit = CommonTypes::getVector2($in);
		$verticalRotationLimit = CommonTypes::getVector2($in);
		$continueTargeting = CommonTypes::getBool($in);
		$blockListeningRadius = LE::readFloat($in);
		$viewOffset = CommonTypes::getVector2($in);
		$entityOffset = CommonTypes::getVector3($in);
		$radius = LE::readFloat($in);
		$yawLimitMin = LE::readFloat($in);
		$yawLimitMax = LE::readFloat($in);
		$audioListenerType = Byte::readUnsigned($in);
		$playerEffects = CommonTypes::getBool($in);
		$aimAssist = CameraPresetAimAssist::read($in);
		$controlScheme = ControlScheme::fromPacket(Byte::readUnsigned($in));
		$applyInheritedStartingRotation = CommonTypes::getBool($in);
		$startingRotation = CommonTypes::getVector2($in);

		return new self(
			$name,
			$parent,
			$xPosition,
			$yPosition,
			$zPosition,
			$pitch,
			$yaw,
			$rotationSpeed,
			$snapToTarget,
			$horizontalRotationLimit,
			$verticalRotationLimit,
			$continueTargeting,
			$blockListeningRadius,
			$viewOffset,
			$entityOffset,
			$radius,
			$yawLimitMin,
			$yawLimitMax,
			$audioListenerType,
			$playerEffects,
			$aimAssist,
			$controlScheme,
			$applyInheritedStartingRotation,
			$startingRotation
		);
	}

	public function write(ByteBufferWriter $out) : void{
		CommonTypes::putString($out, $this->name);
		CommonTypes::putString($out, $this->parent);
		LE::writeFloat($out, $this->xPosition);
		LE::writeFloat($out, $this->yPosition);
		LE::writeFloat($out, $this->zPosition);
		LE::writeFloat($out, $this->pitch);
		LE::writeFloat($out, $this->yaw);
		LE::writeFloat($out, $this->rotationSpeed);
		CommonTypes::putBool($out, $this->snapToTarget);
		CommonTypes::putVector2($out, $this->horizontalRotationLimit);
		CommonTypes::putVector2($out, $this->verticalRotationLimit);
		CommonTypes::putBool($out, $this->continueTargeting);
		LE::writeFloat($out, $this->blockListeningRadius);
		CommonTypes::putVector2($out, $this->viewOffset);
		CommonTypes::putVector3($out, $this->entityOffset);
		LE::writeFloat($out, $this->radius);
		LE::writeFloat($out, $this->yawLimitMin);
		LE::writeFloat($out, $this->yawLimitMax);
		Byte::writeUnsigned($out, $this->audioListenerType);
		CommonTypes::putBool($out, $this->playerEffects);
		$this->aimAssist->write($out);
		Byte::writeUnsigned($out, $this->controlScheme->value);
		CommonTypes::putBool($out, $this->applyInheritedStartingRotation);
		CommonTypes::putVector2($out, $this->startingRotation);
	}
}
