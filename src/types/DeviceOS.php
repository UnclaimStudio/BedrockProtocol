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

final class DeviceOS{

	public const GOOGLE = 0;
	public const IOS = 1;
	public const OSX = 2;
	public const AMAZON = 3;
	public const WIN32 = 4;
	public const DEDICATED = 5;
	public const SONY = 6;
	public const NINTENDO = 7;
	public const XBOX = 8;
	public const LINUX = 9;
	public const UNKNOWN = 10;

}
