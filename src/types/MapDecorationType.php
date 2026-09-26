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

enum MapDecorationType : int{

	case MARKER_WHITE = 0;
	case MARKER_GREEN = 1;
	case MARKER_RED = 2;
	case MARKER_BLUE = 3;
	case X_WHITE = 4;
	case TRIANGLE_RED = 5;
	case SQUARE_WHITE = 6;
	case MARKER_SIGN = 7;
	case MARKER_PINK = 8;
	case MARKER_ORANGE = 9;
	case MARKER_YELLOW = 10;
	case MARKER_TEAL = 11;
	case TRIANGLE_GREEN = 12;
	case SMALL_SQUARE_WHITE = 13;
	case MANSION = 14;
	case MONUMENT = 15;
	case NO_DRAW = 16;
	case VILLAGE_DESERT = 17;
	case VILLAGE_PLAINS = 18;
	case VILLAGE_SAVANNA = 19;
	case VILLAGE_SNOWY = 20;
	case VILLAGE_TAIGA = 21;
	case JUNGLE_TEMPLE = 22;
	case WITCH_HUT = 23;
	case TRIAL_CHAMBERS = 24;
	case ABANDONED_CAMP = 25;
	case BURIED_ANCIENT_CITY = 26;
	case BURIED_MINESHAFT = 27;
	case DESERT_PYRAMID = 28;
	case WARM_OCEAN_RUINS = 29;
	public const COUNT = 30;
}
