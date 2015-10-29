<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="2.0">
<xsl:template match="/assessmentItems">
<HTML>
  <head>
    <link rel='stylesheet' type='text/css' href='estilos/styleXML.css' />
  </head>
  <BODY>
    <center>
      <h1>preguntas.xml</h1>
    <TABLE border="1">
      <tr>
        <TH>Tema</TH>
        <TH>Pregunta</TH>
        <TH>Complejidad</TH>
      </tr>
      <xsl:for-each select="assessmentItem">
      <TR>
        <TD><xsl:value-of select="@subject"></xsl:value-of></TD>
        <TD><xsl:value-of select="itemBody/p"></xsl:value-of></TD>
        <TD><xsl:value-of select="correctResponse/value"></xsl:value-of></TD>
      </TR>
      </xsl:for-each>
      </TABLE>
</center>

  </BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>
