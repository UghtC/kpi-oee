<#
.SYNOPSIS
    Update KPI csv
.DESCRIPTION
    Copy the Latest Continuous Improvement csv file from the L drive
    for usage in the self-hosted KPI web page
.NOTES
    File Name  : copyOEELatest.ps1
    Author     : Tim Knight - timknight@seachill.com
    Requires   : Version 3
#>


$SourceDir = "\\seaadmin\depts data\Continuous Improvement\Resolutions\OEE Screens\"
$DestinationDir = "\\kpi\OEE-Display"

Get-ChildItem -Path $SourceDir -Filter "*.csv" |
    Where-Object { -not $_.PSIsContainer } |
    Sort-Object -Property lastmodified |
    Select-Object -Last 1 | # Sort backtofront onKPI Powershell
    Copy-Item -Destination (Join-Path $DestinationDir "oee.csv")
