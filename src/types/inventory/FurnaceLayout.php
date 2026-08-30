<?php

namespace pocketmine\network\mcpe\protocol\types\inventory;

enum FurnaceLayout : int{
	case NONE = 0;
	case INVENTORY_ONLY = 1;
	case DEFAULT = 2;
}
