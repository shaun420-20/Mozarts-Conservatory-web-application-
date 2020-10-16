<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html>
<body>
<h2>fee Structure</h2>
<table border="1">
<tr bgcolor="green">
<th>Programs</th>
<th>Category</th>
<th>Duration</th>
<th>Fees</th>
</tr>
<xsl:for-each select="FEES/fee-Details">
<xsl:sort select="Fees"/>
<tr bgcolor="pink">
<td><xsl:value-of select="Programs"/></td>
<td><xsl:value-of select="Category"/></td>
<td><xsl:value-of select="Duration"/></td>
<td><xsl:value-of select="Fees"/></td>
</tr>
</xsl:for-each>
</table>
<h5>* This fee structure fees is as per month and programes are hours in a week</h5> 
</body>
</html>
</xsl:template>
</xsl:stylesheet>