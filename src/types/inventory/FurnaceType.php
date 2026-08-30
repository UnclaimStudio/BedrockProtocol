<?php

namespace pocketmine\network\mcpe\protocol\types\inventory;

enum FurnaceType : int{
	case NONE = 0;
	case FURNACE = 1;
	case BLAST_FURNACE = 2;
	case SMOKER = 3;
}
