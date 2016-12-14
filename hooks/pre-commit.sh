#!/usr/bin/env bash


function test_on_commit() {
  bin/test --no-fix || exit 1;
  exit 0;
}

test_on_commit;
