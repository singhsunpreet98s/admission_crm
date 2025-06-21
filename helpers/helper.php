<?php

function normalizeSection(string $section): string
{
   return str_replace('.', '_', $section);
}
