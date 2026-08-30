<?php

namespace pocketmine\network\mcpe\protocol\types\inventory;

enum FurnaceLeftTabIndex : int{
	case NONE = 0;
	case RECIPE_FOOD = 1;
	case RECIPE_ITEMS = 2;
	case RECIPE_BLOCKS = 3;
	case RECIPE_SEARCH = 4;
	case INVENTORY = 5;
}
