<?php

function getDisk()
{
    return 'public';

}

function getUrlResource($resource)
{
    return \Storage::disk(getDisk())->url($resource);
}

function getSizeResource($resource)
{
    if (existsResource($resource)) {
        return \Storage::disk(getDisk())->size($resource);
    }
    return false;
}

function existsResource($resource)
{
    return \Storage::disk(getDisk())->exists($resource);
}

function deleteResource($resource)
{
    if (existsResource($resource)) {
        return \Storage::disk(getDisk())->delete($resource);
    }
    return false;
}